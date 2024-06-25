import lottie from 'lottie-web';

const activateAnimation = (route, containerId, loop = true, speed = 1) => {
    const animationOptions = {
        container: document.getElementById(containerId),
        path: route,
        renderer: 'svg',
        loop: loop,
        autoplay: true,
    };

    const animation = lottie.loadAnimation(animationOptions);

    animation.setSpeed(speed);
}

window.activateAnimation = activateAnimation;
