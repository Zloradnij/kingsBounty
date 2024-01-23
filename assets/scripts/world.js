let keyAction = function() {
    document.addEventListener("keydown", moveKey);

    function moveKey(e) {
        let functionName = 'action' + e.code;

        if ("function" === typeof window[functionName]) {
            window[functionName]();
        }
    }

    /** Переносим объекты на карту */
    objectsToMap();
};

window.onload = function() {

    let island = document.getElementById('island-map');

    /** Карта чистая, эталонная */
    window.map = JSON.parse(island.dataset.map);

    /** Объекты карты */
    window.mapObjects = JSON.parse(island.dataset.map_objects);

    /** Перс */
    window.hero = JSON.parse(island.dataset.hero);

    /** TODO сделать внутри единого канваса */
    window.drawingCanvasMap = document.getElementById('kingsBountyMap');
    window.drawingCanvas = document.getElementById('kingsBounty');

    /** Карта с объектами */
    window.mapWithObjects = JSON.parse(JSON.stringify(window.map));

    /** TODO сделать туман войны */
    window.mistOfWar = JSON.parse(island.dataset.map);

    /** Переносим объекты на карту */
    objectsToMap();

    /** Стартовая отрисовка карты */
    drawSmallMap();

    /** Стартовая героя и окрестностей */
    drawMap();

    /** бегаем по карте */
    keyAction();
};
