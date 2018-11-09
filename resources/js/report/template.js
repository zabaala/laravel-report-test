export const textTemplate = (index, meta) => {
    return`
        <div class="col-6  mb-3">
            <label for="a">${meta.label}:</label>
            <div class="input-group">
                <input type="hidden" name="criteria[${index}][text][meta_id]" value="${meta.id}">
                <select name="criteria[${index}][text][operator]" id="select" class="form-control ${index === 0 && 'd-none'}">
                    <option value="and" selected>AND</option>
                    <option value="or">OR</option>
                </select>
    
                <select name="criteria[${index}][text][comparision_type]" id="select" class="form-control">
                    <option value="equals_to">equals to:</option>
                    <option value="start_with">start with:</option>
                    <option value="end_with">end with:</option>
                </select>
    
                <input class="form-control" name="criteria[${index}][text][value]" placeholder="Value" />
            </div>
        </div>`;
};

export const dateTemplate = (index, meta) => {
    return `
        <div class="col-6 mb-3">
            <label for="a">${meta.label}:</label>
            <div class="input-group">
                <input type="hidden" name="criteria[${index}][date][meta_id]" value="${meta.id}">
                <select name="criteria[${index}][date][operator]" id="select" class="form-control ${index === 0 && 'd-none'}">
                    <option value="and" selected>AND</option>
                    <option value="or">OR</option>
                </select>
                <input class="form-control" name="criteria[${index}][date][start_date]" placeholder="From..." type="date" />
                <input class="form-control" name="criteria[${index}][date][end_date]" placeholder="To..." type="date" />
            </div>
        </div>
    `;
};