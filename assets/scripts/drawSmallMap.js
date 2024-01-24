let drawSmallMap = function() {
    let rectX = 0;
    let rectY = 0;

    if (window.drawingCanvas && window.drawingCanvas.getContext) {

        let context = window.drawingCanvas.getContext('2d');

        context.strokeStyle = "#000";

        for (let i = 0; i < 100; i++) {
            for (let j = 0; j < 100; j++) {
                rectY = i * window.heightMapCell;
                rectX = j * window.widthMapCell;

                if (parseInt(window.hero.position.x) === i && parseInt(window.hero.position.y) === j) {
                    context.fillStyle = '#F00';
                } else {
                    context.fillStyle = fillStyles[window.mapWithObjects[i][j]];
                }

                context.fillRect(rectX, rectY, rectX + window.heightMapCell, rectY + window.widthMapCell);
            }
        }
    }
};
