let drawPanel = function() {
    window.gameContext.fillStyle = '#000';
    window.gameContext.fillRect(0, 0, window.topPanel.width, window.topPanel.height);

    window.gameContext.font = "12px Comic Sans MS";
    window.gameContext.fillStyle = "#999";

    let text = '';

    text += "x:y " + window.hero.position.x + ":" + window.hero.position.y;
    text += " | " + "$ " + window.hero.gulden;
    text += " | " + "mana: " + window.hero.mana;

    window.gameContext.fillText(text, 10, 12);
};
