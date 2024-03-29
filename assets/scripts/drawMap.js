let drawMap = function() {
    let heroImage = new Image();

    let rectX = 0;
    let rectY = 0;

    let geo = 2;

    window.gameContext.strokeStyle = "#000";

    for (let i = 0; i <= 5; i++) {
        for (let j = 0; j <= 5; j++) {
            let bigPositionX = window.hero.position.x - 2 + i;
            let bigPositionY = window.hero.position.y - 2 + j;

            rectY = i * window.heightCell + window.mapStartY;
            rectX = j * window.widthCell + window.mapStartX;

            /** Закрасим фон под объектами */
            window.gameContext.fillStyle = fillStyles[window.map[bigPositionX][bigPositionY]];
            window.gameContext.fillRect(rectX, rectY, rectX + window.heightCell, rectY + window.widthCell);

            /** Центр */
            if (i === 2 && j === 2) {
                heroImage.src = objectImages.hero;

                geo = parseInt(window.mapWithObjects[bigPositionX][bigPositionY]);

                if (geo === 2 || geo === 101) {
                    heroImage.src = objectImages.ship;
                }

                window.gameContext.drawImage(heroImage, rectX, rectY, window.heightCell, window.widthCell);

                continue;
            }

            heroImage.src = fillImages[window.mapWithObjects[bigPositionX][bigPositionY]];

            if (window.hero.ship.positionX === bigPositionX && window.hero.ship.positionY === bigPositionY) {
                heroImage.src = objectImages.ship;
            }

            window.gameContext.drawImage(heroImage, rectX, rectY, window.heightCell, window.widthCell);
        }
    }

    drawPanel();
};
