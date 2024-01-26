let objectActions = function (objectName) {

    let functionName = objectName + 'ObjectAction';

    if ("function" === typeof window[functionName]) {
        window[functionName]();

        /** Переносим объекты на карту */
        objectsToMap();
    }
};

function KnightObjectAction() {
    let rectX = window.mapStartX;
    let rectY = window.mapStartY;

    let rectStop = window.gameFieldSize;

    window.gameContext.fillStyle = '#000';
    window.gameContext.fillRect(rectX, rectY, rectStop, rectStop);

    window.gameContext.font = "12px Comic Sans MS";
    window.gameContext.fillStyle = "#999";
    window.gameContext.textAlign = "center";

    let text = 'Я доблестный рыцарь.';
    window.gameContext.fillText(text, rectStop / 2, 40);

    text = 'Сначала обзаведись войском, жалкий лавочник.';
    window.gameContext.fillText(text, rectStop / 2, 60);

    text = 'Пшёл вон!';
    window.gameContext.fillText(text, rectStop / 2, 80);
}
