import {  TextField, ReferenceArrayField, SingleFieldList, ChipField } from 'react-admin';
import { ShowGuesser } from "@api-platform/admin";

const CustomerShow = (props) => (
    <>
        <h1>Customer Info</h1>
        <ShowGuesser {...props} title="Customers">
            <TextField label="First Name" source="firstName" />
            <hr />
            <TextField label="Last Name" source="lastName" />
            <hr />
            <TextField label="Phone" source="phone" />
            <hr />
            <TextField label="Address" source="address" />
            <hr />
            <TextField label="Notes" source="notes" />
            <hr />
            <ReferenceArrayField label="Vehicles" reference="vehicles" source="vehicles">
                <SingleFieldList>
                    <ChipField source="friendlyName" />
                </SingleFieldList>
            </ReferenceArrayField>
            <hr />
            <ReferenceArrayField label="Services" reference="service_tickets" source="serviceTickets">
                <SingleFieldList>
                    <ChipField source="dateReceived" />
                </SingleFieldList>
            </ReferenceArrayField>
        </ShowGuesser> 
    </>
)

export default CustomerShow