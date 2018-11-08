const modelEl = document.getElementById('model_id');

const metaItem = meta => `
    <div class="form-check">
        <input type="checkbox" class="form-check-input" name="meta[]" value="${meta.id}" id="meta_id_${meta.id}">
        <label for="meta_id_${meta.id}">${meta.label}: ${meta.type}</label>
    </div>
`;

const writeMetas = metas => {
    const html = `<h5 class="mt-5">Available Metas:</h5> ${metas.join(' ')}`;

    console.log(html);

    document.getElementById('metas-list').innerHTML = html;
};

modelEl.addEventListener('change', (e) => {
    const modelName = e.target.options[e.target.selectedIndex].text;
    const modelValue = e.target.options[e.target.selectedIndex].text;

    if (modelValue !== 'n') {
        fetch(`/api/metas/by-model?model=${modelName}`)
        .then(response => response.json())
        .then(json => {
            console.log(json);
            const metas = json.map((meta) => metaItem(meta));
            writeMetas(metas);
        });
    }

});