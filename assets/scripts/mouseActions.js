let mouseActions = function() {

    function getCursorPosition(canvas, event) {
        const rect = canvas.getBoundingClientRect();
        const x = event.clientX - rect.left;
        const y = event.clientY - rect.top;

        let deltaX = 0;
        let deltaY = 0;

        if (x > window.drawingCanvas.width * 3 / 5) {
            deltaY = 1;
        } else if (x < window.drawingCanvas.width * 2 / 5) {
            deltaY = -1;
        }

        if (y > window.drawingCanvas.height * 3 / 5) {
            deltaX = 1;
        } else if (y < window.drawingCanvas.height * 2 / 5) {
            deltaX = -1;
        }

        positionMove(deltaX, deltaY);
    }

    window.drawingCanvas.addEventListener('mousedown', function(e) {
        getCursorPosition(window.drawingCanvas, e)
    });
};
