import {  ReferenceField, TextField, FunctionField, DateField } from 'react-admin';
import { ListGuesser } from "@api-platform/admin";

const ServiceList = (props) => (
    <>
    <h1>Service Tickets</h1>
    <ListGuesser {...props} title="Service Tickets">

        <FunctionField label="Date" source="dateReceived" render={ 
            ({dateReceived}) => `${dateReceived.split("T")[0]}` } />
        
        <TextField source="ticketNo" />
                
        <FunctionField label="Customer" render={ 
        ({customer}) => `${customer.firstName} ${customer.lastName}` } />

        <FunctionField label="Vehicle" render={
            ({vehicle: v}) => `${v.year} ${v.make} ${v.model}`} />
            
    </ListGuesser>
    </>
)

export default ServiceList;
