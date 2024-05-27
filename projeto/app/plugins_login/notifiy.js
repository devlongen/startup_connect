function showLoginNotification() {
    if (Notification.permission === "granted") {
        new Notification("Atenção", {
            body: "Por favor, efetue seu login.",
            icon: "https://example.com/icon.png" // Substitua pelo URL do seu ícone
        });
    } else if (Notification.permission !== "denied") {
        Notification.requestPermission().then(permission => {
            if (permission === "granted") {
                new Notification("Atenção", {
                    body: "Por favor, efetue seu login.",
                    icon: "https://example.com/icon.png" // Substitua pelo URL do seu ícone
                });
            }
        });
    }
}

window.onload = function() {
    showLoginNotification();
}