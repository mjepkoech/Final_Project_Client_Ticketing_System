import axios from 'axios';


export const getCategory = function ()
{
    return axios.get('api/categories');
}

export const saveIssue = function (form)
{
    return axios.post('api/save/issue', form);
}