import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import JSConfetti from 'js-confetti'

const jsConfetti = new JSConfetti()

window.confetti  = ()=> jsConfetti.addConfetti();
