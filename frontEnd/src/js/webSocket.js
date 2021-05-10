let conn = new WebSocket('ws://localhost:8080');

conn.onopen = function(e) {
    console.log("Connection established!");
};



function subscribe(channel) {
    conn.send(JSON.stringify({command: "subscribe", channel: channel}));
}

function sendMessage(msg) {
    conn.send(JSON.stringify({command: "message", message: msg}));
}      