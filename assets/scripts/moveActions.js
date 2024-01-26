let positionMove = function(deltaX, deltaY) {
    let posX = window.hero.position.x;
    let posY = window.hero.position.y;

    if (
            (posX + deltaX) <= 2
         || (posX + deltaX) >= 97
         || (posY + deltaY) <= 2
         || (posY + deltaY) >= 97
    ) {
        return;
    }

    let positionX = parseInt(posX) + deltaX;
    let positionY = parseInt(posY) + deltaY;

    let currentGeo = window.mapWithObjects[posX][posY];
    let nextGeo = window.mapWithObjects[positionX][positionY];

    if (!isSuccessMove(nextGeo)) {
        return;
    }

    if (currentGeo === 2 && nextGeo === 2) {
        window.hero.ship.positionX = positionX;
        window.hero.ship.positionY = positionY;

        draw(positionX, positionY);

        return;
    }

    if (
           currentGeo !== 2
        && nextGeo === 2
    ) {
        if (
                window.hero.ship.positionX === positionX
             && window.hero.ship.positionY === positionY
        ) {
            draw(positionX, positionY);
        }

        return;
    }

    if (currentGeo === 2 && nextGeo !== 2) {
        window.hero.ship.positionX = posX;
        window.hero.ship.positionY = posY;
    }

    draw(positionX, positionY);
};

let isSuccessMove = function (nextGeo) {
    if (
           nextGeo === 1
        || nextGeo === 2
        || nextGeo === 5
        || nextGeo === 101
    ) {
        return true;
    }

    if (
           nextGeo === 3
        || nextGeo === 4
    ) {
        /** TODO Сделать изменение ландшафта работниками */

        return false;
    }

    objectActions(objectMap[nextGeo]);

    return false;
};

let draw = function (positionX, positionY) {
    window.hero.position.x = positionX;
    window.hero.position.y = positionY;

    drawMap();
};

function actionKeyM() {
    if (window.mapVisible) {
        window.mapVisible = false;
        drawMap();

        return;
    }

    window.mapVisible = true;
    drawSmallMap();
}

function actionNumpad8() {
    positionMove(-1, 0)
}

function actionNumpad2() {
    positionMove(1, 0)
}

function actionNumpad6() {
    positionMove(0, 1)
}

function actionNumpad4() {
    positionMove(0, -1)
}

function actionNumpad3() {
    positionMove(1, 1)
}

function actionNumpad1() {
    positionMove(1, -1)
}

function actionNumpad7() {
    positionMove(-1, -1)
}

function actionNumpad9() {
    positionMove(-1, 1)
}
