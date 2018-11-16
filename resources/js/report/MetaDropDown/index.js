/**
 *
 * @param data
 * @param callable
 * @returns {Element}
 */
export const metaDropDownGenerator = (data, callable) => {
    const select = document.createElement('select');

    const chooseOption = document.createElement('option');
    chooseOption.text = 'Choose to add...';

    const noneValue = document.createAttribute('value');
    noneValue.value = 'n';

    chooseOption.setAttributeNode(noneValue);

    select.appendChild(chooseOption);

    data.forEach(item => {
        const option = document.createElement('option');
        option.text = `${item.label} (${item.type})`;
        option.dataset.type = item.type;
        option.dataset.id = item.id;

        const attr = document.createAttribute('value');
        attr.value = item.attribute;

        const id = document.createAttribute('id');
        id.value = 'select-meta';

        option.setAttributeNode(attr);
        select.setAttributeNode(id);
        select.appendChild(option);
    });

    select.addEventListener('change', function () {
        callable(this);
    });

    return select;
};