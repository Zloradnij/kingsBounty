let drawSmallMap = function() {
    let rectX = 0;
    let rectY = 0;

    window.gameContext.strokeStyle = "#000";

    for (let i = 0; i < 100; i++) {
        for (let j = 0; j < 100; j++) {
            rectY = i * window.heightMapCell;
            rectX = j * window.widthMapCell;

            if (parseInt(window.hero.position.x) === i && parseInt(window.hero.position.y) === j) {
                window.gameContext.fillStyle = '#F00';
            } else {
                window.gameContext.fillStyle = fillStyles[window.mapWithObjects[i][j]];
            }

            window.gameContext.fillRect(rectX, rectY, rectX + window.heightMapCell, rectY + window.widthMapCell);
        }
    }
};
