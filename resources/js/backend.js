import '@fortawesome/fontawesome-free/js/all';
import '../scss/backend.scss';

import * as bootstrap from 'bootstrap';
window.bootstrap = bootstrap;

import { marked } from 'marked';
import DOMPurify from 'dompurify';

window.marked = marked;
window.DOMPurify = DOMPurify;

