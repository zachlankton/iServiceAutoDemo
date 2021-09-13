import { Edit } from 'react-admin';
import VehicleForm from "components/Vehicles/VehicleForm"

const VehicleEdit = (props) => (
    <>
    <h1>Edit Vehicle</h1>
    <Edit {...props} title="Vehicles" >
        <VehicleForm />
    </Edit>
    </>
)

export default VehicleEdit;
