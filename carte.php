<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carte Interactive</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background-color: #f4f4f4;
            overflow: hidden;
        }

        .map-wrapper {
            position: relative;
            width: 100vw;
            height: 100vh;
            overflow: hidden;
            cursor: grab;
        }

        .map-container {
            position: absolute;
            width: 1000px;
            height: 1300px;
            background: url('assets/images/carte.jpg') no-repeat top left;
            background-size: cover;
            border: 2px solid #333;
            transform: translate(50%, -33%);
        }

        .room {
            position: absolute;
            width: 50px;
            height: 50px;
            border: 2px solid #333;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            font-size: 12px;
            color: #fff;
        }

        .locked {
            background-color: black;
        }

        .explored {
            background-color: none;
            color: black;
            border: 2px dashed green;
        }

        .accessible {
            background-color: white;
        }
    </style>
</head>

<body>
    <div class="map-wrapper">
        <div class="map-container">
            <div class="room explored" data-state="explored"
                style="top: 650px; left: 90px; width: 400px; height: 550px;"></div>
            <div class="room accessible" data-state="accessible"
                style="top: 148px; left: 90px; width: 400px; height: 464px;"></div>
            <div class="room locked" data-state="locked" style="top: 148px; left: 520px; width: 400px; height: 464px;">
            </div>
            <div class="room locked" data-state="locked" style="top: 655px; left: 520px; width: 300px; height: 290px;">
            </div>
            <div class="room locked" data-state="locked" style="top: 960px; left: 600px; width: 300px; height: 250px;">
            </div>
        </div>
    </div>

    <script>
        // Permet de cliquer et de glisser la carte
        const mapWrapper = document.querySelector('.map-wrapper');
        const mapContainer = document.querySelector('.map-container');

        let isDragging = false;
        let startX, startY;
        let currentX = 0, currentY = 0;

        // Fonction pour récupérer la position actuelle depuis le style transform
        function getTransformValues(element) {
            const transform = getComputedStyle(element).transform;
            if (transform === 'none') {
                return { x: 0, y: 0 };
            }
            const matrix = transform.match(/matrix.*\((.+)\)/);
            if (matrix) {
                const values = matrix[1].split(', ');
                return {
                    x: parseFloat(values[4]),
                    y: parseFloat(values[5]),
                };
            }
            return { x: 0, y: 0 };
        }

        mapWrapper.addEventListener('mousedown', (e) => {
            isDragging = true;

        
            const { x, y } = getTransformValues(mapContainer);
            currentX = x;
            currentY = y;

            startX = e.clientX - currentX;
            startY = e.clientY - currentY;

            mapWrapper.style.cursor = 'grabbing';
        });

        mapWrapper.addEventListener('mousemove', (e) => {
            if (!isDragging) return;

            currentX = e.clientX - startX;
            currentY = e.clientY - startY;

            mapContainer.style.transform = `translate(${currentX}px, ${currentY}px)`;
        });

        mapWrapper.addEventListener('mouseup', () => {
            isDragging = false;
            mapWrapper.style.cursor = 'grab';
        });

        mapWrapper.addEventListener('mouseleave', () => {
            isDragging = false;
            mapWrapper.style.cursor = 'grab';
        });

        // Fonction pour changer l'état des salles lors d'un clic
        document.querySelectorAll('.room').forEach(room => {
            room.addEventListener('click', () => {
                const state = room.dataset.state;

                if (state === 'accessible') {
                    room.classList.remove('accessible');
                    room.classList.add('explored');
                    room.dataset.state = 'explored';
                    room.textContent = '';
                }
            });
        });
    </script>
</body>

</html>