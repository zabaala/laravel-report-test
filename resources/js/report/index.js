import { textTemplate, dateTemplate } from "./template";

let count = 0;

[...document.querySelectorAll('a.meta')].forEach(item => {
    item.addEventListener('click', (e) => {
        e.preventDefault();

        let html = '';

        const data = {
            id: e.target.dataset.id,
            label: e.target.dataset.label
        };

        switch (e.target.dataset.type) {
            case 'text':
                html = textTemplate(count++, data);
                break;
            case 'date':
                html = dateTemplate(count++, data);
                break;
        }
        //
        // const el = document.createElement('div');
        // el.innerHTML = html;
        //
        // const fragment = document.createDocumentFragment();
        // fragment.appendChild(el);
        //
        // document.getElementById('criteria-container').appendChild(fragment);

        document.getElementById('criteria-container').innerHTML += html;
    });
});