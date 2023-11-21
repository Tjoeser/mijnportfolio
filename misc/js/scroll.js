function handleSticky() {
    const rightCards = document.querySelectorAll('.rightcard');
    const scrollThreshold = window.innerHeight * 0.3;

    rightCards.forEach(card => {
        const cardTop = card.getBoundingClientRect().top;

        if (cardTop < scrollThreshold) {
            card.style.position = 'sticky';
            card.style.top = '20px';
            card.style.zIndex = '100';
        } else {
            card.style.position = 'static';
        }
    });
}

window.addEventListener('scroll', handleSticky);