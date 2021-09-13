import {  SimpleForm, ReferenceInput, AutocompleteInput } from 'react-admin';
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

const VehicleForm = (props) => (
    <>
        <SimpleForm {...props}>
            <InputGuesser label="Year" source="year" />
            <InputGuesser label="Make" source="make" />
            <InputGuesser label="Model" source="model" />
            <InputGuesser label="VIN" source="vin" />
            <InputGuesser label="Color" source="color" />
            <ReferenceInput
                source="customer"
                reference="customers"
                label="Customer"
                filterToQuery={searchText => ({ fullName: searchText })}
                >
                <AutocompleteInput optionText="fullName" optionValue="@id" />
            </ReferenceInput>
        </SimpleForm> 
    </>
)

export default VehicleForm