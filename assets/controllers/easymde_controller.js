import { Controller } from '@hotwired/stimulus';
import EasyMDE from "easymde/dist/easymde.min.js";
import "easymde/dist/easymde.min.css";
export default class extends Controller {
    connect() {
        const editor = new EasyMDE({
            element: this.element,
            autoDownloadFontAwesome: true,
            minHeight: '100px',
            spellChecker: false,
        });
    }
}
