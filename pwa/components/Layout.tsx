
import { Layout } from 'react-admin';
import _AppBar from 'components/AppBar';

const MyLayout = (props) => (
    <Layout
        {...props}
        appBar={_AppBar}
    />
)

export default MyLayout;