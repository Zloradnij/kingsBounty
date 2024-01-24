let setSize = function() {
    const pageWidth = document.getElementById('game-block').clientWidth;
    const pageHeight = document.documentElement.scrollHeight;

    const menuHeight = document.getElementById('top-menu').clientHeight;

    window.topPanel = {};
    window.topPanel.height = 20;
    window.topPanel.width = 20;


    let gameFieldHeight = pageHeight - menuHeight;
    let gameFieldWidth = pageWidth;

    if (gameFieldWidth > gameFieldHeight) {
        gameFieldWidth = gameFieldHeight;
        window.topPanel.height = gameFieldHeight;

        window.drawingCanvas.height = gameFieldHeight;
        window.drawingCanvas.width = gameFieldHeight + window.topPanel.width;
    } else {
        gameFieldHeight = gameFieldWidth;
        window.topPanel.width = gameFieldWidth;

        window.drawingCanvas.height = gameFieldWidth + window.topPanel.height;
        window.drawingCanvas.width = gameFieldWidth;
    }

    window.heightCell = Math.floor(gameFieldHeight / 5);
    window.widthCell = Math.floor(gameFieldWidth / 5);

    window.heightMapCell = Math.floor(gameFieldHeight / 100);
    window.widthMapCell = Math.floor(gameFieldWidth / 100);

    console.log('gameFieldHeight = ' + gameFieldHeight);
    console.log('gameFieldWidth = ' + gameFieldWidth);

    console.log('window.topPanel.width = ' + window.topPanel.width);
    console.log('window.topPanel.width sum = ' + (parseInt(gameFieldHeight) + window.topPanel.width));
    //
    // console.log('window.heightMapCell = ' + window.heightMapCell);
    // console.log('window.widthMapCell = ' + window.widthMapCell);
    //
    console.log('window.drawingCanvas.height = ' + window.drawingCanvas.height);
    console.log('window.drawingCanvas.width = ' + window.drawingCanvas.width);
};
