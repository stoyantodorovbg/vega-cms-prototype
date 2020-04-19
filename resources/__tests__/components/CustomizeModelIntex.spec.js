import { mount } from '@vue/test-utils'
import CustomizeModelIndex from "../../js/components/table/CustomizeModelIndex";

describe('CustomizeModelIndex Component', () => {
  test('should mount without crashing', () => {
    const wrapper = mount(CustomizeModelIndex);

    expect(wrapper).toMatchSnapshot();
  });
});
