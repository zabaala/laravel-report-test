// Delete action...
export const deleteAction = () => {
    document.getElementById('delete').addEventListener('click', e => {
        e.preventDefault();

        const confirm = window.confirm('Do you really want delete this entry?');

        if (! confirm) {
            return false;
        }

        document.querySelector('input[name="_method"]').value = 'DELETE';
        document.getElementById('form').submit();
    });
};