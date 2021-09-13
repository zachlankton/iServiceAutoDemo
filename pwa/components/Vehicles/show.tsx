import {  TextField, ReferenceField, ReferenceArrayField, SingleFieldList, ChipField } from 'react-admin';
import { ShowGuesser } from "@api-platform/admin";

const VehicleShow = (props) => (
    <>
        <h1>Vehicle Info</h1>
        <ShowGuesser {...props} title="Vehicles">
            <TextField label="Year" source="year" />
            <hr />
            <TextField label="Make" source="make" />
            <hr />
            <TextField label="Model" source="model" />
            <hr />
            <TextField label="VIN" source="vin" />
            <hr />
            <TextField label="Color" source="color" />
            <hr />
            <ReferenceField label="Customer" source="customer" reference="customers">
                <span>
                <TextField source="firstName" /> <TextField source="lastName" />
                </span>
            </ReferenceField>
            <hr />
            <ReferenceArrayField label="Services" reference="service_tickets" source="serviceTickets">
                <SingleFieldList>
                    <ChipField source="dateReceived" />
                </SingleFieldList>
            </ReferenceArrayField>
        </ShowGuesser> 
    </>
)

export default VehicleShow