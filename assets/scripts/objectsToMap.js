let objectsToMap = function() {

    /** Карта с объектами */
    window.mapWithObjects = JSON.parse(JSON.stringify(window.map));

    /** TODO Где-то здесь проедполагается передвижение грппировки войск противника */

    Object.keys(mapObjects).forEach(function (element) {
        element = mapObjects[element];

        window.mapWithObjects[element.positionX][element.positionY] = element.imageId;
    });

    if (
           window.hero.position.x !== window.hero.ship.positionX
        || window.hero.position.y !== window.hero.ship.positionY
    ) {
        window.mapWithObjects[window.hero.ship.positionX][window.hero.ship.positionY] = 101;
    }
};
