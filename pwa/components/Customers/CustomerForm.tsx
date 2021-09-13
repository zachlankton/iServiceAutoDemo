import {  SimpleForm, TextInput, ReferenceInput, AutocompleteInput } from 'react-admin';
import { InputGuesser } from "@api-platform/admin";

const dateFormat = v => {
  v = new Date(v)
  if (!(v instanceof Date)) return;
  const pad = '00';
  const yy = v.getFullYear().toString();
  const mm = (v.getMonth() + 1).toString();
  const dd = v.getDate().toString();
  return `${yy}-${(pad + mm).slice(-2)}-${(pad + dd).slice(-2)}`;
}

const CustomerForm = (props) => (
    <>
        <SimpleForm {...props}>
            <InputGuesser label="First Name" source="firstName" />
            <InputGuesser label="Last Name" source="lastName" />
            <TextInput label="Phone" source="phone" />
            <TextInput multiline label="Address" source="address" helperText="Press Enter for New Line" />
            <TextInput multiline label="Notes" source="notes" helperText="Press Enter for New Line"/>
        </SimpleForm> 
    </>
)

export default CustomerForm