let keyAction = function() {
    document.addEventListener("keydown", moveKey);

    function moveKey(e) {
        let functionName = 'action' + e.code;

        if ("function" === typeof window[functionName]) {
            window[functionName]();
        }
    }
};

window.onload = function() {

    let island = document.getElementById('island-map');

    window.map = JSON.parse(island.dataset.map);
    window.mapObjects = JSON.parse(island.dataset.map_objects);

    window.hero = JSON.parse(island.dataset.hero);

    window.drawingCanvasMap = document.getElementById('kingsBountyMap');
    window.drawingCanvas = document.getElementById('kingsBounty');

    drawSmallMap();

    drawMap();

    keyAction();
};

// e.code = ArrowDown
// e.code = ArrowUp
// e.code = KeyW
// e.code = KeyS
// e.code = KeyD
// e.code = KeyA
// e.code = KeyD
// e.code = KeyA
// e.code = AltLeft
// e.code = ShiftLeft