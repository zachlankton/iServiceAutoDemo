import { Create } from 'react-admin';
import VehicleForm from "components/Vehicles/VehicleForm"

const ServiceCreate = (props) => (
    <>
    <h1>Create Vehicle</h1>
    <Create {...props} title="Vehicles" >
        <VehicleForm />
    </Create>
    </>
)

export default ServiceCreate;
