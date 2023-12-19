function handleSticky() {
    const rightCards = document.querySelectorAll('.rightcard');
    const scrollThreshold = window.innerHeight * 0.3;

    rightCards.forEach(card => {
        const cardTop = card.getBoundingClientRect().top;

        if (cardTop < scrollThreshold) {
            card.style.position = 'sticky';
            card.style.top = '68px';
            card.style.zIndex = '1';
        } else {
            card.style.position = 'static';
        }
    });
}

window.addEventListener('scroll', handleSticky);