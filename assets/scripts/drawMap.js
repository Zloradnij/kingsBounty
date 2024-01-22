let drawMap = function() {
    let heroImage = new Image();

    let height = 500;
    let width = 500;

    window.drawingCanvas.height = height;
    window.drawingCanvas.width = width;

    let heightCell = Math.floor(500 / 5);
    let widthCell = Math.floor(500 / 5);

    let rectX = 0;
    let rectY = 0;

    if (window.drawingCanvas && window.drawingCanvas.getContext) {
        let context = window.drawingCanvas.getContext('2d');
        context.strokeStyle = "#000";

        for (let i = 0; i <= 5; i++) {
            for (let j = 0; j <= 5; j++) {
                let bigPositionX = window.hero.position.x - 2 + i;
                let bigPositionY = window.hero.position.y - 2 + j;

                rectY = i * heightCell;
                rectX = j * widthCell;

                context.fillStyle = fillStyles[window.map[bigPositionX][bigPositionY]];
                context.fillRect(rectX, rectY, rectX + heightCell, rectY + widthCell);

                if (i === 2 && j === 2) {
                    heroImage.src = objectImages.hero;

                    if (parseInt(window.map[bigPositionX][bigPositionY]) === 2) {
                        heroImage.src = objectImages.ship;
                    }

                    context.drawImage(heroImage, rectX, rectY, heightCell, widthCell);

                    continue;
                }

                heroImage.src = fillImages[window.map[bigPositionX][bigPositionY]];

                Object.keys(mapObjects).forEach(function (element) {
                    element = mapObjects[element];

                    if (parseInt(element.positionX) === bigPositionX && parseInt(element.positionY) === bigPositionY) {
                        heroImage.src = fillImages[element.imageId];
                    }
                });

                if (window.hero.ship.positionX === bigPositionX && window.hero.ship.positionY === bigPositionY) {
                    heroImage.src = fillImages[101];
                }

                context.drawImage(heroImage, rectX, rectY, heightCell, widthCell);
            }
        }
    }
};
