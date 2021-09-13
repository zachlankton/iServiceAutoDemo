import {  DateInput, required, SimpleForm, TextInput, ReferenceInput, AutocompleteInput } from 'react-admin';
import { InputGuesser } from "@api-platform/admin";


const dateFormat = v => {
    if (v) return v.split("T")[0]
    return 
    // v = new Date(v.split("T")[0])
    // if (!(v instanceof Date) || isNaN(v)) return;
    // const pad = '00';
    // const yy = v.getFullYear().toString();
    // const mm = (v.getMonth() + 1).toString();
    // const dd = (v.getDate() + 1).toString();
    // const dString = `${yy}-${(pad + mm).slice(-2)}-${(pad + dd).slice(-2)}`;
    // console.log(v, dString)
    // return dString
}

const validCustomer = [required("Must Select a Customer")]
const validVehicle = [required("Must Select a Vehicle")]
const validDate = [required("Must Enter Date Received")]

const ServiceForm = (props) => (
    <>
        <SimpleForm {...props}>
            
            <InputGuesser label="Ticket No" source="ticketNo" />
            
            <ReferenceInput
                validate={validCustomer}
                source="customer.@id"
                reference="customers"
                label="Customer"
                filterToQuery={searchText => ({ fullName: searchText })}
                >
                <AutocompleteInput optionText="fullName" optionValue="@id" />
            </ReferenceInput>
            
            <ReferenceInput
                validate={validVehicle}
                source="vehicle.@id"
                reference="vehicles"
                label="Vehicle"
                filterToQuery={searchText => ({ friendlyName: searchText })}
                >
                <AutocompleteInput optionText="friendlyName" optionValue="@id" />
            </ReferenceInput>
            
            <TextInput multiline label="Work Performed" source="workPerformed" helperText="Press Enter for New Line" />
            
            <DateInput label="Date Received" source="dateReceived" format={dateFormat} validate={validDate}/>
            
            <DateInput label="Date Completed" source="dateCompleted" format={dateFormat} />
        
        </SimpleForm> 
    </>
)

export default ServiceForm