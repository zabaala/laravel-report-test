import './Prototype';
import { metaDropDownGenerator } from './MetaDropDown';
import { deleteAction } from './Controllers';
import {criteriaHtmlBuilder} from "./CriteriaHtmlBuilder/index";

/**
 * Meta select handler...
 *
 * @param el
 */
const metaDropDownOnChangeHandler = el => {
    const selectedOption = el.options[el.selectedIndex];

    const data = {
        label: selectedOption.text,
        value: '',
        type: selectedOption.dataset.type,
        id: selectedOption.dataset.id,
    };

    const counter = document.querySelectorAll('#criteria-container .col-6').length;

    criteriaHtmlBuilder(counter, data);

    el.selectedIndex = 0;
};

/**
 * Model select listener...
 */
document.getElementById('model').addEventListener('change', function () {
    const model = this.options[this.selectedIndex].value;

    if (model !== 'n') {
        fetch('/api/metas/by-model-name?model=' + model)
        .then(res => res.json().then(body => ({
            json: body,
            response: res
        })))
        .then(({json}) => {
            document.getElementById('meta-select-container').innerHTML = '';
            document.getElementById('meta-select-container').appendChild(
                metaDropDownGenerator(json, metaDropDownOnChangeHandler)
            );
        });
    }
});

/**
 * Special calls, if Report has a ID property.
 */
if (Report.hasOwnProperty('id') && Report.id !== '') {
    // delete actions...
    deleteAction();

    // add existing criteria to report form...
    Report.criteria.constructor === Array && Report.criteria.forEach((item, i) => {
        let data = {};

        if (item.hasOwnProperty('text')) {
            data = item.text;
            data.type = 'text';
        }

        if (item.hasOwnProperty('date')) {
            data = item.date;
            data.type = 'date';
        }

        criteriaHtmlBuilder(i, data);
    });


    // Trigger onChange from select Model...
    const changeEvent = new Event('change');
    document.getElementById('model').dispatchEvent(changeEvent);
}