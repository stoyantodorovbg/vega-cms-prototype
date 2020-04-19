import { mount } from '@vue/test-utils'
import DynamicMenu from "../../js/components/menu/DynamicMenu";

describe('DynamicMenu Component', () => {
  test('should mount without crashing', () => {
    const wrapper = mount(DynamicMenu);

    expect(wrapper).toMatchSnapshot();
  });
});

