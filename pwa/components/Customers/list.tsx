import { TextField } from 'react-admin';
import { ListGuesser } from "@api-platform/admin";

const CustomerList = (props) => (
    <>
    <h1>Customers</h1>
    <ListGuesser {...props} title="Customers">
       
        <TextField label="First Name" source="firstName" />
        <TextField label="Last Name" source="lastName" />
            
    </ListGuesser>
    </>
)

export default CustomerList;
