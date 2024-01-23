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

    let currentGeo = mapWithObjects[posX][posY];
    let nextGeo = mapWithObjects[positionX][positionY];

    if (
            nextGeo !== 1
         && nextGeo !== 2
         && nextGeo !== 5
    ) {
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

let draw = function(positionX, positionY) {
    window.hero.position.x = positionX;
    window.hero.position.y = positionY;

    drawSmallMap();
    drawMap();
};

function actionKeyM() {
    let mapBlock = document.getElementById('kingsBountyMap');

    mapBlock.classList.toggle("hidden");
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
