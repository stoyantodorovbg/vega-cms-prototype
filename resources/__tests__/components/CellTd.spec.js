import { mount } from '@vue/test-utils'
import CellTd from "../../js/components/table/CellTd";

describe('CellTd Component', () => {
  test('should mount without crashing', () => {
    const wrapper = mount(CellTd);

    expect(wrapper).toMatchSnapshot()
  });
});
