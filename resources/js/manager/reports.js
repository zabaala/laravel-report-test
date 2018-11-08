const modelEl = document.getElementById('model_id');

const metaItem = meta => `
    <div class="form-check">
        <input type="checkbox" class="form-check-input" name="meta[]" value="${meta.id}" id="meta_id_${meta.id}">
        <label for="meta_id_${meta.id}">${meta.label}: ${meta.type}</label>
    </div>
`;

const container = document.getElementById('metas-list');

const writeMetas = metas => {
    container.innerHTML = `<h5 class="mt-5">Available Metas:</h5> ${metas.join(' ')}`;
};

modelEl.addEventListener('change', (e) => {
    const modelName = e.target.options[e.target.selectedIndex].text;
    const modelValue = e.target.options[e.target.selectedIndex].value;

    if (modelValue !== 'n') {
        fetch(`/api/metas/by-model?model=${modelName}`)
        .then(response => response.json())
        .then(json => {
            const metas = json.map((meta) => metaItem(meta));
            writeMetas(metas);
        });

        return;
    }

    container.innerHTML = '';
});