import { textTemplate, dateTemplate } from "../templates/metas";

/**
 * Criteria HTML generator.
 *
 * @param i
 * @param data
 */
export const criteriaHtmlBuilder = (i, data) => {
    let html = '';
    let id = '';

    switch (data.type) {
        case 'text':
            id = `text_criteria_${i}`;
            html += textTemplate(id, i, data);
            break;

        case 'date':
            id = `date_criteria_${i}`;
            html += dateTemplate(id, i, data);
            break;
    }

    if (html === '') {
        return;
    }

    const fragment = document.createRange().createContextualFragment(html);

    // append element into html...
    document.getElementById('criteria-container').appendChild(fragment);

    // add a listener to remove button...
    document.getElementById(id + '_remove').addEventListener('click', (e) => {
        e.preventDefault();
        document.getElementById(id).remove();
    });
};