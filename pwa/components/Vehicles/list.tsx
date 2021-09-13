import { FunctionField } from 'react-admin';
import { ListGuesser } from "@api-platform/admin";

const VehicleList = (props) => (
    <>
    <h1>Vehicles</h1>
    <ListGuesser {...props} title="Vehicles">
       
        <FunctionField label="Vehicle" render={
            (v) => `${v.color} ${v.year} ${v.make} ${v.model}`} />
            
    </ListGuesser>
    </>
)

export default VehicleList;
