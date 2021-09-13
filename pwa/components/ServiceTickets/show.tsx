import {  ReferenceField, TextField } from 'react-admin';
import { ShowGuesser } from "@api-platform/admin";

const ServiceShow = (props) => (
    <>
    <h1>Service Ticket Info</h1>
    <ShowGuesser {...props} title="Service Tickets">
        
        <TextField label="Ticket No" source="ticketNo" />
        <hr />
        <ReferenceField label="Customer" source="customer.@id" reference="customers">
            <span>
            <TextField source="firstName" /> <TextField source="lastName" />
            </span>
        </ReferenceField>
        <hr />
        <ReferenceField label="Vehicle" source="vehicle.@id" reference="vehicles">
            <span>
            <TextField source="make" /> <TextField source="model" />
            </span>
        </ReferenceField>
        <hr />
        <TextField label="Work Performed" source="workPerformed" />
        <hr />
        <TextField label="Date Received" source="dateReceived" />
        <hr />
        <TextField label="Date Completed" source="dateCompleted" />
            
    </ShowGuesser>
    </>
)

export default ServiceShow;
