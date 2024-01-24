let keyAction = function() {
    document.addEventListener("keydown", moveKey);

    function moveKey(e) {
        let functionName = 'action' + e.code;

        if ("function" === typeof window[functionName]) {
            window[functionName]();

            /** Переносим объекты на карту */
            objectsToMap();
        }
    }
};

window.onload = function() {

    let island = document.getElementById('island-map');

    /** Карта чистая, эталонная */
    window.map = JSON.parse(island.dataset.map);

    /** Переключение режимов карты */
    window.mapVisible = false;

    /** Объекты карты */
    window.mapObjects = JSON.parse(island.dataset.map_objects);

    /** Перс */
    window.hero = JSON.parse(island.dataset.hero);

    window.drawingCanvas = document.getElementById('kingsBounty');

    if (!window.drawingCanvas || !window.drawingCanvas.getContext) {
        alert('Ваш браузер не поддерживает ту штуку, на которой мы рисуем игру. Увы.');
    }

    window.gameContext = window.drawingCanvas.getContext('2d');

    setSize();

    /** TODO сделать туман войны */
    window.mistOfWar = JSON.parse(island.dataset.map);

    /** Переносим объекты на карту */
    objectsToMap();

    /** Управление хомяком */
    mouseActions();

    /** Стартовая героя и окрестностей */
    drawMap();

    /** бегаем по карте */
    keyAction();
};
