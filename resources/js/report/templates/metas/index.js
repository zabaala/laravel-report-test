export const textTemplate = (id, index, data) => {
    return`
        <div class="col-6  mb-3" id="${id}">
            <label for="a">
                ${data.label}: 
                <small>
                    <a href="#" id="${id}_remove">remove</a>
                </small>
            </label>
            
            <div class="input-group">
                <input type="hidden" name="criteria[${index}][text][meta_id]" value="${data.id || data.meta_id}">
                <input type="hidden" name="criteria[${index}][text][label]" value="${data.label}">
                <select name="criteria[${index}][text][operator]" id="select" class="form-control ${index === 0 ? 'd-none' : ''}">
                    <option value="and" ${data.operator === '' ? 'selected' : (data.operator === 'and' ? 'selected' : '')}>AND</option>
                    <option value="or" ${data.operator === 'or' ? 'selected' : ''}>OR</option>
                </select>
    
                <select name="criteria[${index}][text][comparision_type]" id="select" class="form-control">
                    <option value="equals_to"  ${data.comparision_type === 'equals_to' ? 'selected' : ''}>equals to:</option>
                    <option value="start_with" ${data.comparision_type === 'start_with' ? 'selected' : ''}>start with:</option>
                    <option value="end_with"   ${data.comparision_type === 'end_with' ? 'selected' : ''}>end with:</option>
                </select>
    
                <input class="form-control" name="criteria[${index}][text][value]" value="${data.value}" placeholder="Value" />
            </div>
        </div>`;
};

export const dateTemplate = (id, index, data) => {
    return `
        <div class="col-6 mb-3" id="${id}">
            <label for="a">
                ${data.label}: 
                <small>
                    <a href="#" id="${id}_remove">remove</a>
                </small>
            </label>
            
            <div class="input-group">
                <input type="hidden" name="criteria[${index}][date][meta_id]" value="${data.id || data.meta_id}">
                <input type="hidden" name="criteria[${index}][date][label]" value="${data.label}">
                <select name="criteria[${index}][date][operator]" id="select" class="form-control ${index === 0 ? 'd-none' : ''}">
                    <option value="and" ${data.operator === '' ? 'selected' : (data.operator === 'and' ? 'selected' : '')}>AND</option>
                    <option value="or" ${data.operator === 'or' ? 'selected' : ''}>OR</option>
                </select>
                <input class="form-control" name="criteria[${index}][date][start_date]" value="${data.start_date}" placeholder="From..." type="date" />
                <input class="form-control" name="criteria[${index}][date][end_date]" value="${data.end_date}" placeholder="To..." type="date" />
            </div>
        </div>
    `;
};