var MR = function (X) { return Math.random() * X }, TwL = TweenLite, G = document.querySelectorAll('.crystal');

function BTweens() {
    var W = window.innerWidth, H = window.innerHeight, C = 2000;
    for (var i = G.length; i--;) {
        var c = C, BA = [], GWidth = G[i].offsetWidth, GHeight = G[i].offsetHeight;
        while (c--) { 
            var SO = MR(1); 
            var distanceFactor = 0.8; // Adjust this factor to control the distance of movement
            BA.push({ x: MR((W - GWidth) * distanceFactor), y: MR((H - GHeight) * distanceFactor)});
        }
        if (G[i].T) { 
            BTweens();
        }
        G[i].T = TweenMax.to(G[i], C * 2, { bezier: { timeResolution: 0, type: "soft", values: BA }, delay: i * 0.35, ease: Linear.easeNone });
    }
}

// Call the function initially
BTweens();

// Update the function for window resize and scroll
window.onresize = window.onscroll = function () {
    BTweens();
};
