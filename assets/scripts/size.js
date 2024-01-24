let setSize = function() {
    const pageWidth = document.getElementById('game-block').clientWidth;
    const pageHeight = document.documentElement.scrollHeight;

    const menuHeight = document.getElementById('top-menu').clientHeight;

    window.canvasWidth = pageWidth;
    window.canvasHeight = pageHeight - menuHeight;

    window.drawingCanvas.height = pageHeight - menuHeight;
    window.drawingCanvas.width = pageWidth;

    if (window.drawingCanvas.width > window.drawingCanvas.height) {
        window.drawingCanvas.width = window.drawingCanvas.height;
    } else {
        window.drawingCanvas.height = window.drawingCanvas.width;
    }

    window.heightCell = Math.floor(window.drawingCanvas.height / 5);
    window.widthCell = Math.floor(window.drawingCanvas.width / 5);

    window.heightMapCell = Math.floor(window.drawingCanvas.height / 100);
    window.widthMapCell = Math.floor(window.drawingCanvas.width / 100);

    console.log('pageHeight = ' + pageHeight);
    console.log('menuHeight = ' + menuHeight);

    console.log('window.heightCell = ' + window.heightCell);
    console.log('window.widthCell = ' + window.widthCell);

    console.log('window.heightMapCell = ' + window.heightMapCell);
    console.log('window.widthMapCell = ' + window.widthMapCell);

    console.log('window.drawingCanvas.height = ' + window.drawingCanvas.height);
    console.log('window.drawingCanvas.width = ' + window.drawingCanvas.width);
};
