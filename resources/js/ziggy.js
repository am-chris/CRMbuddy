    var Ziggy = {
        namedRoutes: {"login":{"uri":"login","methods":["GET","HEAD"],"domain":null},"logout":{"uri":"logout","methods":["POST"],"domain":null},"register":{"uri":"register","methods":["GET","HEAD"],"domain":null},"password.request":{"uri":"password\/reset","methods":["GET","HEAD"],"domain":null},"password.email":{"uri":"password\/email","methods":["POST"],"domain":null},"password.reset":{"uri":"password\/reset\/{token}","methods":["GET","HEAD"],"domain":null},"password.update":{"uri":"password\/reset","methods":["POST"],"domain":null},"password.confirm":{"uri":"password\/confirm","methods":["GET","HEAD"],"domain":null},"home":{"uri":"home","methods":["GET","HEAD"],"domain":null},"clients.index":{"uri":"clients","methods":["GET","HEAD"],"domain":null},"clients.create":{"uri":"clients\/create","methods":["GET","HEAD"],"domain":null},"clients.store":{"uri":"clients","methods":["POST"],"domain":null},"clients.show":{"uri":"clients\/{client}","methods":["GET","HEAD"],"domain":null},"clients.edit":{"uri":"clients\/{client}\/edit","methods":["GET","HEAD"],"domain":null},"clients.update":{"uri":"clients\/{client}","methods":["PUT","PATCH"],"domain":null},"clients.destroy":{"uri":"clients\/{client}","methods":["DELETE"],"domain":null}},
        baseUrl: 'http://localhost:3000/',
        baseProtocol: 'http',
        baseDomain: 'localhost',
        basePort: 3000,
        defaultParameters: []
    };

    if (typeof window.Ziggy !== 'undefined') {
        for (var name in window.Ziggy.namedRoutes) {
            Ziggy.namedRoutes[name] = window.Ziggy.namedRoutes[name];
        }
    }

    export {
        Ziggy
    }
