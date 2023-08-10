import './bootstrap';

import JSConfetti from 'js-confetti'

const jsConfetti = new JSConfetti()

window.confetti  = ()=> jsConfetti.addConfetti();
